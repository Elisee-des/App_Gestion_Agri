import React from 'react';

const LoginPage = React.lazy(() => import("../pages/common/login"));
const Dashboard = React.lazy(() => import("../pages/private/home"));
const Producteur = React.lazy(() => import("../pages/private/producteur"));
const Profil = React.lazy(() => import("../pages/private/profil"));

const privateRoutes = [
    {
        path: '/admin/dashboard',
        component: Dashboard,
        permissions: [],
    },
    {
        path: '/admin/producteurs',
        component: Producteur,
        permissions: [],
    },
    {
        path: '/admin/profil',
        component: Profil,
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

export {publicRoutes, privateRoutes}
