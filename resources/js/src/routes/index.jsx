import React from "react";
import { Route, Routes } from "react-router-dom";
import Loader from "../components/loader";
import PrivateLayout from "../layouts/private";
import CommonLayout from "../layouts/common";
import NotFound from '../pages/common/notFound';
import { privateRoutes } from "./allRoute";

const LoginPage = React.lazy(() => import("../pages/common/login"));

const MainRoutes = () => {
    return (
        <Routes>
            <Route element={<PrivateLayout />}>
                {privateRoutes.map((route, index) => {
                    const ElementPage = route.component;
                    return (
                        <Route
                            path={route.path}
                            key={index}
                            element={
                                <React.Suspense
                                    fallback={
                                        <>
                                            <Loader />
                                        </>
                                    }
                                >
                                    <ElementPage />
                                </React.Suspense>
                            }
                        />
                    );
                })}
            </Route>

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
            <Route path="*" element={<NotFound />} />
        </Routes>
    );
};

export default MainRoutes;
