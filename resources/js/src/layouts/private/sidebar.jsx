import React from 'react';
import { Link, Outlet } from 'react-router-dom';

const Sidebar = () => {
    return (
        <div className="app-menu navbar-menu">

            <div className="navbar-brand-box">
                <a href="index.html" className="logo logo-dark">
                    <span className="logo-sm">
                        <img src="images/logo-sm.png" alt="" height="22" />
                    </span>
                    <span className="logo-lg">
                        <img src="images/logo-dark.png" alt="" height="17" />
                    </span>
                </a>
                <a href="index.html" className="logo logo-light">
                    <span className="logo-sm">
                        <img src="images/logo-sm.png" alt="" height="22" />
                    </span>
                    <span className="logo-lg">
                        <img src="images/logo-light.png" alt="" height="17" />
                    </span>
                </a>
                <button type="button" className="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover">
                    <i className="ri-record-circle-line"></i>
                </button>
            </div>

            <div id="scrollbar">
                <div className="container-fluid">

                    <div id="two-column-menu">
                    </div>
                    <ul className="navbar-nav" id="navbar-nav">
                        <li className="menu-title"><span data-key="t-menu">Menu</span></li>
                        <li className="nav-item">
                            <Link className="nav-link menu-link" to="/admin/dashboard" role="button">
                                <i className="ri-dashboard-2-line"></i> <span data-key="t-dashboard">Tableau de bord</span>
                            </Link>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link menu-link" href="#" role="button">
                                <i className="ri-list-settings-line "></i> <span data-key="t-organisation_paysannes">Organisation Paysannes</span>
                            </a>
                        </li>
                        <li className="nav-item">
                            <Link className="nav-link menu-link" to="/admin/producteurs" role="button">
                                <i className=" ri-open-arm-fill"></i> <span data-key="t-producteurs">Producteurs</span>
                            </Link>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link menu-link" href="" role="button">
                                <i className=" ri-dashboard-line"></i> <span data-key="t-faitieres">Faitières</span>
                            </a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link menu-link" href="" role="button">
                                <i className="ri-team-line"></i> <span data-key="t-utilisateurs">Utilisateurs</span>
                            </a>
                        </li>
                        <li className="nav-item">
                            <a className="nav-link menu-link" href="#" role="button">
                                <i className=" ri-settings-2-line"></i> <span data-key="t-parametre">Paramètre</span>
                            </a>
                        </li>
                    </ul >
                </div >
            </div >
            <div className="sidebar-background"></div>
        </div >
    );
}

export default Sidebar;
