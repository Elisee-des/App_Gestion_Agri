import React, { useState } from "react";
import { Form } from 'react-bootstrap';
import { Button, Input } from 'reactstrap';
import AuthService from '../../../services/authService';
import { useNavigate } from "react-router-dom";
import ApiRoute from "../../../utility/ApiRoute";


const LoginPage = () => {

    const [formInput, setFormInput] = useState({email:'', password:''});
    const [message, setMessage] = useState();
    let navigate = useNavigate();
    const handSave = (e) => {
        e.preventDefault();
        AuthService.login(formInput.email, formInput.password).then(
            (resData) => {
                navigate('/admin/dashboard');
            },
            error => {
                const resMessage = ApiRoute?.handlerError(error);
                setMessage(resMessage)
                alert('Leger probleme', resMessage)
            }
        )
        console.log(formInput);
    }


    return (
        <div className="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
            <div className="bg-overlay"></div>
            <div className="auth-page-content overflow-hidden pt-lg-5">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-12">
                            <div className="card overflow-hidden">
                                <div className="row g-0">
                                    <div className="col-lg-6">
                                        <div className="p-lg-5 p-4 auth-one-bg h-100">
                                            <div className="bg-overlay"></div>
                                            <div className="position-relative h-100 d-flex flex-column">
                                                <div className="mb-4">
                                                    <a
                                                        href="index.html"
                                                        className="d-block"
                                                    >
                                                        <img
                                                            src="../images/logo-light.png"
                                                            alt=""
                                                            height="18"
                                                        />
                                                    </a>
                                                </div>
                                                <div className="mt-auto">
                                                    <div className="mb-3">
                                                        <i className="ri-double-quotes-l display-4 text-success"></i>
                                                    </div>

                                                    <div
                                                        id="qoutescarouselIndicators"
                                                        className="carousel slide"
                                                        data-bs-ride="carousel"
                                                    >
                                                        <div className="carousel-indicators">
                                                            <button
                                                                type="button"
                                                                data-bs-target="#qoutescarouselIndicators"
                                                                data-bs-slide-to="0"
                                                                className="active"
                                                                aria-current="true"
                                                                aria-label="Slide 1"
                                                            ></button>
                                                            <button
                                                                type="button"
                                                                data-bs-target="#qoutescarouselIndicators"
                                                                data-bs-slide-to="1"
                                                                aria-label="Slide 2"
                                                            ></button>
                                                            <button
                                                                type="button"
                                                                data-bs-target="#qoutescarouselIndicators"
                                                                data-bs-slide-to="2"
                                                                aria-label="Slide 3"
                                                            ></button>
                                                        </div>
                                                        <div className="carousel-inner text-center text-white-50 pb-5">
                                                            <div className="carousel-item active">
                                                                <p className="fs-15 fst-italic">
                                                                    " Great!
                                                                    Clean code,
                                                                    clean
                                                                    design, easy
                                                                    for
                                                                    customization.
                                                                    Thanks very
                                                                    much! "
                                                                </p>
                                                            </div>
                                                            <div className="carousel-item">
                                                                <p className="fs-15 fst-italic">
                                                                    " The theme
                                                                    is really
                                                                    great with
                                                                    an amazing
                                                                    customer
                                                                    support."
                                                                </p>
                                                            </div>
                                                            <div className="carousel-item">
                                                                <p className="fs-15 fst-italic">
                                                                    " Great!
                                                                    Clean code,
                                                                    clean
                                                                    design, easy
                                                                    for
                                                                    customization.
                                                                    Thanks very
                                                                    much! "
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div className="col-lg-6">
                                        <div className="p-lg-5 p-4">
                                            <div>
                                                <h5 className="text-primary">
                                                    Welcome Back !
                                                </h5>
                                                <p className="text-muted">
                                                    Sign in to continue to
                                                    Velzon.
                                                </p>
                                            </div>

                                            <div className="mt-4">
                                                <Form onSubmit={handSave}>
                                                    <div className="mb-3">
                                                        <label
                                                            htmlFor="email"
                                                            className="form-label"
                                                        >
                                                            Email
                                                        </label>
                                                        <Input
                                                            type="text"
                                                            className="form-control"
                                                            id="email"
                                                            placeholder="Enter email"
                                                            onChange={(e)=>setFormInput({...formInput, email: e.target.value})}
                                                        />
                                                    </div>

                                                    <div className="mb-3">
                                                        <div className="float-end">
                                                            <a
                                                                href="auth-pass-reset-cover.html"
                                                                className="text-muted"
                                                            >
                                                                Forgot password?
                                                            </a>
                                                        </div>
                                                        <label
                                                            className="form-label"
                                                            htmlFor="password-input"
                                                        >
                                                            Password
                                                        </label>
                                                        <div className="position-relative auth-pass-inputgroup mb-3">
                                                            <Input
                                                                type="password"
                                                                className="form-control pe-5 password-input"
                                                                placeholder="Enter password"
                                                                id="password-input"
                                                                onChange={(e)=>setFormInput({...formInput, password: e.target.value})}
                                                            />
                                                            <button
                                                                className="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                                type="button"
                                                                id="password-addon"
                                                            >
                                                                <i className="ri-eye-fill align-middle"></i>
                                                            </button>
                                                        </div>
                                                    </div>


                                                    <div className="mt-4">
                                                        <Button
                                                            className="btn btn-success w-100"
                                                            type="submit"
                                                        >
                                                            Se Connecter
                                                        </Button>
                                                    </div>

                                                </Form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer className="footer">
                <div className="container">
                    <div className="row">
                        <div className="col-lg-12">
                            <div className="text-center">
                                <p className="mb-0">
                                    &copy;
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script>{" "}
                                    Velzon. Crafted with{" "}
                                    <i className="mdi mdi-heart text-danger"></i>{" "}
                                    by Themesbrand
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    );
};

export default LoginPage;
