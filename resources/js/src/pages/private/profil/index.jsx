import React from "react";

const ProfilPage = () => {
    return (
        <div class="row ">
            <div class="col-xxl-3">
                <div class="card mt-1">
                    <div class="card-body p-">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                <img
                                    src="../images/users/avatar-1.jpg"
                                    class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                    alt="user-profile-image"
                                />
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <input
                                        id="profile-img-file-input"
                                        type="file"
                                        class="profile-img-file-input"
                                    />
                                    <label
                                        for="profile-img-file-input"
                                        class="profile-photo-edit avatar-xs"
                                    >
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            <i class="ri-camera-fill"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <h5 class="fs-16 mb-1">Anna Adame</h5>
                            <p class="text-muted mb-0">
                                Lead Designer / Developer
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-9">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        <ul
                            class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0"
                            role="tablist"
                        >
                            <li class="nav-item">
                                <a
                                    class="nav-link active"
                                    data-bs-toggle="tab"
                                    href="#personalDetails"
                                    role="tab"
                                >
                                    <i class="fas fa-home"></i>
                                    Personal Details
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    data-bs-toggle="tab"
                                    href="#changePassword"
                                    role="tab"
                                >
                                    <i class="far fa-user"></i>
                                    Change Password
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    data-bs-toggle="tab"
                                    href="#experience"
                                    role="tab"
                                >
                                    <i class="far fa-envelope"></i>
                                    Experience
                                </a>
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    data-bs-toggle="tab"
                                    href="#privacy"
                                    role="tab"
                                >
                                    <i class="far fa-envelope"></i>
                                    Privacy Policy
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content">
                            <div
                                class="tab-pane active"
                                id="personalDetails"
                                role="tabpanel"
                            >
                                <form action="#">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label
                                                    for="firstnameInput"
                                                    class="form-label"
                                                >
                                                    Prenom
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="firstnameInput"
                                                    placeholder="Entre votre prenom"
                                                    value="Dave"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label
                                                    for="lastnameInput"
                                                    class="form-label"
                                                >
                                                    Nom
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="lastnameInput"
                                                    placeholder="Enter votre nom"
                                                    value="Adame"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label
                                                    for="phonenumberInput"
                                                    class="form-label"
                                                >
                                                    Telephone
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    id="phonenumberInput"
                                                    placeholder="Enter your phone number"
                                                    value="+(1) 987 6543"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label
                                                    for="emailInput"
                                                    class="form-label"
                                                >
                                                   Adresse Email
                                                </label>
                                                <input
                                                    type="email"
                                                    class="form-control"
                                                    id="emailInput"
                                                    placeholder="Enter your email"
                                                    value="daveadame@velzon.com"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label
                                                    for="JoiningdatInput"
                                                    class="form-label"
                                                >
                                                    Date d'inscription
                                                </label>
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    data-provider="flatpickr"
                                                    id="JoiningdatInput"
                                                    data-date-format="d M, Y"
                                                    data-deafult-date="24 Nov, 2021"
                                                    placeholder="Select date"
                                                />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="hstack gap-2 justify-content-end">
                                                <button
                                                    type="submit"
                                                    class="btn btn-primary"
                                                >
                                                    Enregistrer
                                                </button>
                                                <button
                                                    type="button"
                                                    class="btn btn-soft-success"
                                                >
                                                    Retour
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ProfilPage;
