import React from 'react';

const Dashboard = React.lazy(() => import("../pages/private/home"));
const LoginPage = React.lazy(() => import("../pages/common/login"));

const privateRoutes = [
    {
        path: 'admin/dashboard',
        component: Dashboard,
        permissions: []
    },
    ,
    {
        path: '/admin/producteurs',
        component: LoginPage,
        permissions: [],
    }
];

const publicRoutes = [
    {
        path: '/login',
        component: LoginPage,
        permissions: [],
    }
];

export {privateRoutes, publicRoutes};