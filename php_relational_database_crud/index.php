<?php

use League\Container\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Middleware\MethodOverrideMiddleware;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;

require __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/lib/branchTable.php';
require_once __DIR__.'/lib/categoryTable.php';
require_once __DIR__.'/lib/sellerTable.php';
require_once __DIR__.'/lib/productTable.php';
require_once __DIR__.'/lib/saleTable.php';
require_once __DIR__.'/lib/Reports.php';

$container = new Container();
$container->add('branchTable', branchTable::class);
$container->add('categoryTable', categoryTable::class);
$container->add('sellerTable', sellerTable::class);
$container->add('productTable', productTable::class);
$container->add('saleTable', saleTable::class);
$container->add('reports', Reports::class);

AppFactory::setContainer($container);
$app = AppFactory::create();

$twig = Twig::create('views', ['cache' => false]);

$app->add(TwigMiddleware::create($app, $twig));
$app->add(new MethodOverrideMiddleware());

//root
$app->get('/', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    return $view->render($response, 'index.html', []);
});

//vista de los sucursales/branches
$app->get('/branch', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    $db = $this->get('branchTable');

    $branches = $db->allBranches();

    return $view->render($response, 'branches/branch.index.html',
        [
            'branches' => $branches
        ]);
});

//vista add branch
$app->get('/branch/create', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $params = $request->getQueryParams();

    return $view->render($response, 'branches/branch.create.html', [
        'errors' => $params['errors'] ?? null
    ]);
});

//guardando a un branch
$app->post('/branch', function (Request $request, Response $response, $args) {

    $params = (array)$request->getParsedBody();

    $state = $params['state'] ?? null;
    $city = $params['city'] ?? null;
    $address = $params['address'] ?? null;
    $phone = $params['phone'] ?? null;

    $db = $this->get('branchTable');

    $errors = [];

    if (!$state) {
        $errors['state'] = 'State is required.';
    }

    if (!$city) {
        $errors['city'] = 'City is required.';
    }

    if (!$address) {
        $errors['address'] = 'Address is required';
    }

    if (!$phone) {
        $errors['phone'] = 'Phone is required';
    }

    if (count($errors) > 0) {
        $url = "/branch/create?" . http_build_query(['errors' => $errors]);
        return $response->withHeader('Location', $url)->withStatus(302);
    }

    $db->saveBranch(
        [
            'state' => $state,
            'city' => $city,
            'address' => $address,
            'phone' => $phone
        ]
    );

    return $response->withHeader('Location', '/branch')->withStatus(302);
});

//desactivar un branch
$app->patch('/branch/status/{id}', function (Request $request, Response $response, $args) {

    $db = $this->get('branchTable');

    $id = $args['id'] ?? null;
    $sellers = $db->findBranch($id);

    if (!$id || !$sellers) {
        return $response->withHeader('Location', '/branch')->withStatus(302);
    }

    $db->deactivateBranch($id);
    return $response->withHeader('Location', '/branch')->withStatus(302);
});

//vista edit  branch
$app->get('/branch/{id}/edit', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $params = $request->getQueryParams();

    $db = $this->get('branchTable');
    $id = $args['id'];
    $branch = $db->findBranch($id);

    return $view->render($response, 'branches/branch.edit.html', [
        'id' => $id,
        'branch' => $branch,
        'errors' => $params['errors'] ?? null,
    ]);
});

//editar un branch
$app->patch('/branch/{id}', function (Request $request, Response $response, $args) {

    $params = (array)$request->getParsedBody();
    $db = $this->get('branchTable');

    $id = $args['id'] ?? null;
    $branch = $db->findBranch($id);

    if (!$id || !$branch) {
        return $response->withHeader('Location', '/branch')->withStatus(302);
    }

    $state = $params['state'] ?? null;
    $city = $params['city'] ?? null;
    $address = $params['address'] ?? null;
    $phone = $params['phone'] ?? null;


    $errors = [];

    if (!$state) {
        $errors['state'] = 'State is required.';
    }

    if (!$city) {
        $errors['city'] = 'City is required.';
    }

    if (!$address) {
        $errors['address'] = 'Address is required';
    }

    if (!$phone) {
        $errors['phone'] = 'Phone is required';
    }

    if (count($errors) > 0) {
        $url = "/branch/$id/edit?" . http_build_query(['errors' => $errors]);
        return $response->withHeader('Location', $url)->withStatus(302);
    }

    $db->editBranch(
        $id,
        [
            'state' => $state,
            'city' => $city,
            'address' => $address,
            'phone' => $phone
        ]
    );

    return $response->withHeader('Location', '/branch')->withStatus(302);
});

// category views-----------------------------------------------------------

//vista de los categorias/categories
$app->get('/category', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    $db = $this->get('categoryTable');

    $categories = $db->allCategories();

    return $view->render($response, 'categories/category.index.html',
        [
            'categories' => $categories
        ]);
});

//vista add category
$app->get('/category/create', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $params = $request->getQueryParams();

    return $view->render($response, 'categories/category.create.html', [
        'errors' => $params['errors'] ?? null
    ]);
});

//guardando a un category
$app->post('/category', function (Request $request, Response $response, $args) {
    $params = (array)$request->getParsedBody();
    $category = $params['category'] ?? null;
    $db = $this->get('categoryTable');
    $errors = [];

    if (!$category) {
        $errors['category'] = 'Category is required.';
    }

    if (count($errors) > 0) {
        $url = "/category/create?" . http_build_query(['errors' => $errors]);
        return $response->withHeader('Location', $url)->withStatus(302);
    }

    $db->saveCategory(
        [
            'category' => $category
        ]
    );

    return $response->withHeader('Location', '/category')->withStatus(302);
});

//vista edit  category
$app->get('/category/{id}/edit', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $params = $request->getQueryParams();
    $db = $this->get('categoryTable');
    $id = $args['id'];
    $categories = $db->findCategory($id);

    return $view->render($response, 'categories/category.edit.html', [
        'id' => $id,
        'categories' => $categories,
        'errors' => $params['errors'] ?? null,
    ]);
});

//editar un category
$app->patch('/category/{id}', function (Request $request, Response $response, $args) {

    $params = (array)$request->getParsedBody();
    $db = $this->get('categoryTable');
    $id = $args['id'] ?? null;
    $categories = $db->findCategory($id);

    if (!$id || !$categories) {
        return $response->withHeader('Location', '/category')->withStatus(302);
    }

    $category = $params['category'] ?? null;
    $errors = [];

    if (!$category) {
        $errors['category'] = 'Category is required.';
    }

    if (count($errors) > 0) {
        $url = "/category/$id/edit?" . http_build_query(['errors' => $errors]);
        return $response->withHeader('Location', $url)->withStatus(302);
    }

    $db->editCategory(
        $id,
        [
            'category' => $category
        ]
    );

    return $response->withHeader('Location', '/category')->withStatus(302);
});

//desactivar un category
$app->patch('/category/status/{id}', function (Request $request, Response $response, $args) {

    $db = $this->get('categoryTable');

    $id = $args['id'] ?? null;
    $categories = $db->findCategory($id);

    if (!$id || !$categories) {
        return $response->withHeader('Location', '/category')->withStatus(302);
    }

    $db->deactivateCategory($id);
    return $response->withHeader('Location', '/category')->withStatus(302);
});

//seller view --------------------------------------------------------------

//sellers view
$app->get('/seller', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    $db = $this->get('sellerTable');

    $sellers = $db->allSellers();

    return $view->render($response, 'seller/seller.index.html',
        [
            'sellers' => $sellers
        ]);
});

//vista add seller
$app->get('/seller/create', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $params = $request->getQueryParams();
    $db = $this->get('sellerTable');
    $branches = $db->Branche();

    return $view->render($response, 'seller/seller.create.html', [
        'errors' => $params['errors'] ?? null,
        'branches' => $branches
    ]);
});

//guardando a un seller
$app->post('/seller', function (Request $request, Response $response, $args) {

    $params = (array)$request->getParsedBody();

    $first_name = $params['first_name'] ?? null;
    $last_name = $params['last_name'] ?? null;
    $dni = $params['dni'] ?? null;
    $birth_day = $params['birth_day'] ?? null;
    $hiring_date = $params['hiring_date'] ?? null;
//    $work_id = $params['work_id'] ?? null;
    $phone = $params['phone'] ?? null;
    $branches = $params['branches'] ?? null;

    $db = $this->get('sellerTable');

    $errors = [];

    if (!$first_name) {
        $errors['first_name'] = 'First name is required.';
    }

    if (!$last_name) {
        $errors['last_name'] = 'Last name is required.';
    }

    if (!$dni) {
        $errors['dni'] = 'DNI is required';
    }

    if (!$birth_day) {
        $errors['birth_day'] = 'Date of birth is required';
    }

    if (!$hiring_date) {
        $errors['hiring_date'] = 'Hiring date is required';
    }

//    if (!$work_id) {
//        $errors['work_id'] = 'Work id is required';
//    }

    if (!$phone) {
        $errors['phone'] = 'Phone is required';
    }

    if (!$branches) {
        $errors['branches'] = 'branch is required';
    }

    if (count($errors) > 0) {
        $url = "/seller/create?" . http_build_query(['errors' => $errors]);
        return $response->withHeader('Location', $url)->withStatus(302);
    }

    $db->saveSeller(
        [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'dni' => $dni,
            'birth_day' => $birth_day,
            'hiring_date' => $hiring_date,
            'work_id' => $work_id,
            'phone' => $phone,
            'branches' => $branches,
        ]
    );

    return $response->withHeader('Location', '/seller')->withStatus(302);
});

//vista edit seller
$app->get('/seller/{id}/edit', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $params = $request->getQueryParams();
    $db = $this->get('sellerTable');
    $id = $args['id'];
    $sellers = $db->findSeller($id);
    $branches = $db->Branche();

    return $view->render($response, 'seller/seller.edit.html', [
        'id' => $id,
        'branches' => $branches,
        'sellers' => $sellers,
        'errors' => $params['errors'] ?? null,
    ]);
});

//editando a un seller
$app->patch('/seller/{id}', function (Request $request, Response $response, $args) {

    $params = (array)$request->getParsedBody();
    $id = $args['id'] ?? null;
    $db = $this->get('sellerTable');

    $seller = $db->findSeller($id);
    if (!$id || !$seller) {
        return $response->withHeader('Location', '/seller')->withStatus(302);
    }

    $first_name = $params['first_name'] ?? null;
    $last_name = $params['last_name'] ?? null;
    $dni = $params['dni'] ?? null;
    $birth_day = $params['birth_day'] ?? null;
    $hiring_date = $params['hiring_date'] ?? null;
    $work_id = $params['work_id'] ?? null;
    $phone = $params['phone'] ?? null;
    $branches = $params['branches'] ?? null;

    $errors = [];

    if (!$first_name) {
        $errors['first_name'] = 'First name is required.';
    }

    if (!$last_name) {
        $errors['last_name'] = 'Last name is required.';
    }

    if (!$dni) {
        $errors['dni'] = 'DNI is required';
    }

    if (!$birth_day) {
        $errors['birth_day'] = 'Date of birth is required';
    }

    if (!$hiring_date) {
        $errors['hiring_date'] = 'Hiring date is required';
    }

    if (!$work_id) {
        $errors['work_id'] = 'Work id is required';
    }

    if (!$phone) {
        $errors['phone'] = 'Phone is required';
    }

    if (!$branches) {
        $errors['branches'] = 'branch is required';
    }

    if (count($errors) > 0) {
        $url = "/seller/$id/edit?" . http_build_query(['errors' => $errors]);
        return $response->withHeader('Location', $url)->withStatus(302);
    }

    $db->editSeller(
        $id,
        [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'dni' => $dni,
            'birth_day' => $birth_day,
            'hiring_date' => $hiring_date,
            'work_id' => $work_id,
            'phone' => $phone,
            'branches' => $branches,
        ]
    );
    return $response->withHeader('Location', '/seller')->withStatus(302);
});

//desactivar un seller
$app->patch('/seller/status/{id}', function (Request $request, Response $response, $args) {

    $db = $this->get('sellerTable');

    $id = $args['id'] ?? null;
    $sellers = $db->findSeller($id);

    if (!$id || !$sellers) {
        return $response->withHeader('Location', '/seller')->withStatus(302);
    }

    $db->deactivateSeller($id);
    return $response->withHeader('Location', '/seller')->withStatus(302);
});
//product view ------------------------------------------------------

// product view
$app->get('/product', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    $db = $this->get('productTable');

    $products = $db->allProducts();

    return $view->render($response, 'products/product.index.html',
        [
            'products' => $products
        ]);
});

//vista add product
$app->get('/product/create', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $params = $request->getQueryParams();
    $db = $this->get('productTable');
    $categories = $db->Category();

    return $view->render($response, 'products/product.create.html', [
        'errors' => $params['errors'] ?? null,
        'categories' => $categories
    ]);
});

//guardando a un product
$app->post('/product', function (Request $request, Response $response, $args) {

    $params = (array)$request->getParsedBody();

    $product = $params['product_name'] ?? null;
    $category = $params['categories'] ?? null;

    $db = $this->get('productTable');

    $errors = [];

    if (!$product) {
        $errors['product'] = 'Product is required.';
    }

    if (count($errors) > 0) {
        $url = "/product/create?" . http_build_query(['errors' => $errors]);
        return $response->withHeader('Location', $url)->withStatus(302);
    }

    $db->saveProduct(
        [
            'product_name' => $product,
            'category' => $category
        ]
    );

    return $response->withHeader('Location', '/product')->withStatus(302);
});

//vista edit product
$app->get('/product/{id}/edit', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $params = $request->getQueryParams();

    $db = $this->get('productTable');
    $id = $args['id'];

    $products = $db->findProduct($id);

    $categories = $db->Category();

    return $view->render($response, 'products/product.edit.html', [
        'id' => $id,
        'categories' => $categories,
        'products' => $products,
        'errors' => $params['errors'] ?? null,
    ]);
});

//editando a un product
$app->patch('/product/{id}', function (Request $request, Response $response, $args) {

    $params = (array)$request->getParsedBody();
    $id = $args['id'] ?? null;

    $product = $params['product_name'] ?? null;
    $category = $params['categories'] ?? null;

    $db = $this->get('productTable');

    $errors = [];

    if (!$product) {
        $errors['product'] = 'Product is required.';
    }

    if (count($errors) > 0) {
        $url = "/product/$id/edit?" . http_build_query(['errors' => $errors]);
        return $response->withHeader('Location', $url)->withStatus(302);
    }

    $db->editProduct(
        $id,
        [
            'product' => $product,
            'category' => $category
        ]
    );
    return $response->withHeader('Location', '/product')->withStatus(302);
});

//desactivar un product
$app->patch('/product/status/{id}', function (Request $request, Response $response, $args) {

    $db = $this->get('productTable');

    $id = $args['id'] ?? null;
    $sellers = $db->findProduct($id);

    if (!$id || !$sellers) {
        return $response->withHeader('Location', '/product')->withStatus(302);
    }

    $db->deactivateProduct($id);
    return $response->withHeader('Location', '/product')->withStatus(302);
});

// ventas view
$app->get('/sale', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    $db = $this->get('saleTable');

    $sales = $db->allSales();

    return $view->render($response, 'sales/sale.index.html',
        [
            'sales' => $sales
        ]);
});

//vista add sale
$app->get('/sale/create', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $params = $request->getQueryParams();
    $db = $this->get('saleTable');
    $branches = $db->Branche();
    $sellers = $db->Seller();
    $products = $db->Product();

    return $view->render($response, 'sales/sale.create.html', [
        'errors' => $params['errors'] ?? null,
        'branches' => $branches,
        'sellers' => $sellers,
        'products' => $products
    ]);
});

//guardando a un sale
$app->post('/sale', function (Request $request, Response $response, $args) {

    $params = (array)$request->getParsedBody();

    $seller = $params['seller'] ?? null;
    $product = $params['product'] ?? null;
    $branch = $params['branch'] ?? null;
    $quantity = $params['quantity'] ?? null;
    $price = $params['price'] ?? null;
    $sale_date = $params['sale_date'] ?? null;

    $db = $this->get('saleTable');

    $errors = [];

    if (!$sale_date) {
        $errors['sale_date'] = 'Date is required.';
    }

    if (!$quantity) {
        $errors['quantity'] = 'Quantity is required.';
    }

    if (!$price) {
        $errors['price'] = 'Price is required.';
    }

    if (count($errors) > 0) {
        $url = "/sale/create?" . http_build_query(['errors' => $errors]);
        return $response->withHeader('Location', $url)->withStatus(302);
    }

    $db->saveSale(
        [
            'seller' => $seller,
            'product' => $product,
            'branch' => $branch,
            'quantity' => $quantity,
            'price' => $price,
            'sale_date' => $sale_date
        ]
    );

    return $response->withHeader('Location', '/sale')->withStatus(302);
});


// vista edit venta
$app->get('/sale/{id}/edit', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $params = $request->getQueryParams();

    $db = $this->get('saleTable');
    $id = $args['id'];

    $sales = $db->findSale($id);

    $branches = $db->Branche();
    $sellers = $db->Seller();
    $products = $db->Product();



    return $view->render($response, 'sales/sale.edit.html', [
        'id' => $id,
        'branches' => $branches,
        'sellers' => $sellers,
        'sales' => $sales,
        'products' => $products,
        'errors' => $params['errors'] ?? null,
    ]);
});

// reports -----------------------------------------------------------------------

//vista de reportes de las sucursales/branches
$app->get('/branch/report', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    $db = $this->get('reports');
    $branches = $db->BranchesReport();

    return $view->render($response, 'reports/report.branches.index.html',
        [
            'branches' => $branches
        ]);
});

//vista de reportes por sucursales/branches
$app->get('/branch/report/{id}', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    $db = $this->get('reports');
    $id = $args['id'];
    $currentBranch = $db->findBranchReport($id);
    $reports = $db->branchReport($id);

    return $view->render($response, 'reports/report.branches.show.html',
        [
            'reports' => $reports,
            'currentBranch' => $currentBranch
        ]);
});

//vista de reportes de las sucursales/branches
$app->get('/seller/report', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);
    $db = $this->get('reports');
    $sellers = $db->SellersReport();

    return $view->render($response, 'reports/report.seller.index.html',
        [
            'sellers' => $sellers
        ]);
});

//vista de reporte ventas por vendedor/seller
$app->get('/seller/report/{id}', function (Request $request, Response $response, $args) {
    $view = Twig::fromRequest($request);

    $db = $this->get('reports');
    $id = $args['id'];
    $currentSeller = $db->findSellerReport($id);
    $sellers = $db->sellerReport($id);

    return $view->render($response, 'reports/report.seller.show.html',
        [
            'sellers' => $sellers,
            'currentSeller' => $currentSeller
        ]);
});

$app->run();
