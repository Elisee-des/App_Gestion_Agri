import React from "react";
import { Route, Routes } from "react-router-dom";
import CommonLayout from "../layouts/common";
import NotFound from "../layouts/common";
import Loader from "../components/loader";
import PrivateLayout from "../pages/private";
import PrivateRoute from "./allRoute";


const MainRoutes = () => {
    return (
        <Routes>
            <Route element={<PrivateLayout />}>
                {PrivateRoute.map((route, index) => {
                    const ElementPage = route.component;
                    return (
                        <Route
                            path={route.path}
                            key={index}
                            element={
                                <React.Suspense fallback={<><Loader /></>}>
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
            <Route path="*" element={<NotFound />} />
        </Routes>
    );
};

export default MainRoutes;
