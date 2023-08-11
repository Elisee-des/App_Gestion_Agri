import React from "react";
import SideBar from "./SideBar";
import Header from "./Header";
import Footer from "./Footer";
import { Outlet } from "react-router-dom";

const PrivateLayout = () => {
    return (
        <div id="layout-wrapper">
            <Header />
            <SideBar />
            <div className="vertical-overlay"></div>

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">
                                                <a href="javascript: void(0);">
                                                    Dashboards
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item active">
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
