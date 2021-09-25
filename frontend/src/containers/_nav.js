import React from 'react'
import CIcon from '@coreui/icons-react'

const _nav =  [
  {
    _tag: 'CSidebarNavItem',
    name: 'Dashboard',
    to: '/admin/dashboard',
    icon: <CIcon name="cil-speedometer" customClasses="c-sidebar-nav-icon"/>,
    badge: {
      color: 'info',
      text: 'NEW',
    }
  },
  {
    _tag: 'CSidebarNavTitle',
    _children: ['Quản lý']
  },
  {
    _tag: 'CSidebarNavDropdown',
    name: 'Thu chi',
    route: '/admin/cost',
    icon: 'cil-money',
    _children: [
      {
        _tag: 'CSidebarNavItem',
        name: 'Tạo phiếu thu',
        to: '/admin/cost/receipt-vourcher',
      },
      {
        _tag: 'CSidebarNavItem',
        name: 'Tạo phiếu chi',
        to: '/admin/cost/payment-vourcher',
      },
      {
        _tag: 'CSidebarNavItem',
        name: 'Danh sách thu thi',
        to: '/admin/cost',
      },
    ],
  },
  {
    _tag: 'CSidebarNavDropdown',
    name: 'Kho',
    route: '/admin/warehouse',
    icon: 'cil-house',
    _children: [
      {
        _tag: 'CSidebarNavItem',
        name: 'Danh sách kho',
        to: '/admin/warehouse/manager',
      },
      {
        _tag: 'CSidebarNavItem',
        name: 'Kiểm kê kho',
        to: '/buttons/brand-buttons',
      },
    ],
  },
  {
    _tag: 'CSidebarNavDropdown',
    name: 'Sản phẩm',
    route: '/admin/product',
    icon: 'cil-gift',
    _children: [
      {
        _tag: 'CSidebarNavItem',
        name: 'Danh mục',
        to: '/admin/product/category',
      },
      {
        _tag: 'CSidebarNavItem',
        name: 'Thêm sản phẩm',
        to: '/admin/product/add',
      },
      {
        _tag: 'CSidebarNavItem',
        name: 'Tất cả sản phẩm',
        to: '/admin/product/manager',
      },
    ],
  },
  {
    _tag: 'CSidebarNavDropdown',
    name: 'Đơn hàng',
    route: '/notifications',
    icon: 'cil-cart',
    _children: [
      {
        _tag: 'CSidebarNavItem',
        name: 'Tất cả đơn hàng',
        to: '/admin/order',
      },
      {
        _tag: 'CSidebarNavItem',
        name: 'Khuyến mãi',
        to: '/admin/order/sale',
      },
      {
        _tag: 'CSidebarNavItem',
        name: 'Vận chuyển',
        to: '/admin/order/shipping',
      },
    ]
  },
  {
    _tag: 'CSidebarNavDropdown',
    name: 'Khách hàng',
    route: '/admin/customer',
    icon: 'cil-user',
    _children: [
      {
        _tag: 'CSidebarNavItem',
        name: 'Thêm mới',
        to: '/admin/customer/new',
      },
      {
        _tag: 'CSidebarNavItem',
        name: 'Danh sách',
        to: '/admin/customer/manager',
      },
    ]
  },
  {
    _tag: 'CSidebarNavItem',
    name: 'Widgets',
    to: '/widgets',
    icon: 'cil-calculator',
    badge: {
      color: 'info',
      text: 'NEW',
    },
  },
  {
    _tag: 'CSidebarNavDivider'
  },
  {
    _tag: 'CSidebarNavTitle',
    _children: ['Thiết lập']
  },
  {
    _tag: 'CSidebarNavDropdown',
    name: 'Người dùng',
    route: '/admin/users',
    icon: 'cil-money',
    _children: [
      {
        _tag: 'CSidebarNavItem',
        name: 'Vài trò',
        to: '/admin/users',
      },
      {
        _tag: 'CSidebarNavItem',
        name: 'Set quyền',
        to: '/admin/users/:id',
      },
      {
        _tag: 'CSidebarNavItem',
        name: 'Danh sách',
        to: '/admin/users',
      },
    ],
  },
]

export default _nav
