import React, { useState, useEffect } from 'react'
import {
  BarChart,
  Bar,
  XAxis,
  CartesianGrid,
  Tooltip,
  ResponsiveContainer,
} from 'recharts'

import ky from 'ky'
import ChartSkeleton from '../../utilities/ChartSkeleton'

export default function BarChartItem() {
  const [totalClicks, setTotalClicks] = useState(null)
  const [isChartLoading, setIsChartLoading] = useState(true)

  let data = []

  let months = [
    {
      month: 'Jan',
      clicks: '',
    },
    {
      month: 'Feb',
      clicks: '',
    },
    {
      month: 'Mar',
      clicks: '',
    },
    {
      month: 'Apr',
      clicks: '',
    },
    {
      month: 'May',
      clicks: '',
    },
    {
      month: 'Jun',
      clicks: '',
    },
    {
      month: 'Jul',
      clicks: '',
    },
    {
      month: 'Aug',
      clicks: '',
    },
    {
      month: 'Sep',
      clicks: '',
    },
    {
      month: 'Oct',
      clicks: '',
    },
    {
      month: 'Nov',
      clicks: '',
    },
    {
      month: 'Dec',
      clicks: '',
    },
  ]

  useEffect(() => {
    const accessToken = localStorage.getItem('access_token')

    ky.get(`http://localhost:8000/api/clicks`, {
      headers: {
        Authorization: `Bearer ${accessToken}`,
      },
    })
      .json()
      .then((resp) => {
        setTotalClicks(resp)
        setIsChartLoading(false)
      })
  }, [])

  if (totalClicks !== null) {
    data = months.map((month) => {
      totalClicks.map((click) => {
        if (month.month === click.month) {
          return (month.clicks = click.clicks)
        }
      })
      return month
    })
  }

  return (
    <>
      {isChartLoading ? (
        <ChartSkeleton />
      ) : (
        <ResponsiveContainer width="99%">
          <BarChart data={data}>
            <CartesianGrid vertical={false} />
            <XAxis dataKey="month" />
            <Tooltip />
            <Bar dataKey="clicks" fill="#575BDE" radius={[5, 5, 0, 0]} />
          </BarChart>
        </ResponsiveContainer>
      )}
    </>
  )
}
