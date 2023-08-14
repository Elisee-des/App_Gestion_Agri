import React from "react";

const NoMatchPage = () => {
    return (
        <div className="row">
            <div className="col-lg-12">
                <div className="text-center pt-4">
                    <div className="">
                        <img
                            src="assets/images/error.svg"
                            alt=""
                            className="error-basic-img move-animation"
                        />
                    </div>
                    <div className="mt-n4">
                        <h1 className="display-1 fw-medium">404</h1>
                        <h3 className="text-uppercase">
                            Sorry, Page not Found 😭
                        </h3>
                        <p className="text-muted mb-4">
                            The page you are looking for not available!
                        </p>
                        <a href="index.html" className="btn btn-success">
                            <i className="mdi mdi-home me-1"></i>Back to home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default NoMatchPage;
