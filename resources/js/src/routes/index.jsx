import React from 'react';
import { Route, Routes } from 'react-router-dom';
import CommonLayout from '../layouts/common';
import NoMatchPage from '../pages/common/NoMatch';
import Loader from '../components/loader';

const LoginPage = React.lazy(() => import("../pages/common/login"));
const RegisterPage = React.lazy(() => import("../pages/common/register"));

const MainRoutes = () => {
    return (
        <Routes>
            <Route element={<CommonLayout />}>
                <Route
                    path="/"
                    element={
                        <React.Suspense fallback={<><Loader /> </>}>
                            <LoginPage />
                        </React.Suspense>
                    }
                />
            </Route>
            <Route path="*" element={<NoMatchPage />} />
        </Routes>
    );
}

export default MainRoutes;
