import React from "react";
import { Route, Routes } from "react-router-dom";
import CommonLayout from "../layouts/common";
import NoMatchPage from "../pages/common/NoMatch";
import Loader from "../components/loader";
import { privateRoutes } from './allRoutes';
import PrivateLayout from "../layouts/private";

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
                                    {/* <RequireAuth> */}
                                        <ElementPage />
                                    {/* </RequireAuth> */}
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
                        <React.Suspense
                            fallback={
                                <>
                                    <Loader />
                                </>
                            }
                        >
                            <LoginPage />
                        </React.Suspense>
                    }
                />
            </Route>
            <Route path="*" element={<NoMatchPage />} />
        </Routes>
    );
};

export default MainRoutes;
