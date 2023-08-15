import React from "react";
import { Outlet } from "react-router-dom";
import Header from "./header";
import Footer from "./footer";
import Sidebar from "./sidebar";

const PrivateLayout = () => {
    return (
        <div id="layout-wrapper">
            <Header />
            <Sidebar />
            <div className="vertical-overlay"></div>

            <div className="main-content">
                <div className="page-content">
                    <div className="container-fluid">
                        <div className="row">
                            <div className="col-12">
                                <div className="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 className="mb-sm-0">Dashboard</h4>

                                    <div className="page-title-right">
                                        <ol className="breadcrumb m-0">
                                            <li className="breadcrumb-item">
                                                <a href="#">
                                                    Dashboards
                                                </a>
                                            </li>
                                            <li className="breadcrumb-item active">
                                                Dashboard
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <Outlet />
                    </div>
                </div>
                <Footer />
            </div>
        </div>
    );
};

export default PrivateLayout;
