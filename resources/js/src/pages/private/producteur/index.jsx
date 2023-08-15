import React from "react";

const ProducteurPage = () => {
    return (
        <div className="row">
            <div className="col-lg-12">
                <div className="card">
                    <div className="card-body">
                        <div id="customerList">
                            <div className="row g-4 mb-3">
                                <div className="col-sm-auto"></div>
                                <div className="col-sm">
                                    <div className="d-flex justify-content-sm-end">
                                        <div className="search-box ms-2">
                                            <input
                                                type="text"
                                                className="form-control search"
                                                placeholder="Search..."
                                            />
                                            <i className="ri-search-line search-icon"></i>
                                        </div>
                                        <div className="mx-2">
                                            <button
                                                type="button"
                                                className="btn btn-success add-btn"
                                                data-bs-toggle="modal"
                                                id="create-btn"
                                                data-bs-target="#showModal"
                                            >
                                                <i className="ri-add-line align-bottom me-1"></i>{" "}
                                                Importer
                                            </button>
                                        </div>
                                        <div className="mx-2">
                                            <button
                                                type="button"
                                                className="btn btn-success add-btn"
                                                data-bs-toggle="modal"
                                                id="create-btn"
                                                data-bs-target="#showModal"
                                            >
                                                <i className="ri-add-line align-bottom me-1"></i>{" "}
                                                Ajouter
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div className="table-responsive table-card mt-3 mb-1">
                                <table
                                    className="table align-middle table-nowrap"
                                    id="customerTable"
                                >
                                    <thead className="table-light">
                                        <tr>
                                            <th scope="col">
                                                <div className="form-check">
                                                    <input
                                                        className="form-check-input"
                                                        type="checkbox"
                                                        id="checkAll"
                                                        value="option"
                                                    />
                                                </div>
                                            </th>
                                            <th
                                                className="sort"
                                                data-sort="customer_name"
                                            >
                                                Customer
                                            </th>
                                            <th className="sort" data-sort="email">
                                                Email
                                            </th>
                                            <th className="sort" data-sort="phone">
                                                Phone
                                            </th>
                                            <th className="sort" data-sort="date">
                                                Joining Date
                                            </th>
                                            <th className="sort" data-sort="status">
                                                Delivery Status
                                            </th>
                                            <th className="sort" data-sort="action">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody className="list form-check-all">
                                        <tr>
                                            <th scope="row">
                                                <div className="form-check">
                                                    <input
                                                        className="form-check-input"
                                                        type="checkbox"
                                                        name="chk_child"
                                                        value="option1"
                                                    />
                                                </div>
                                            </th>
                                            <td className="id">
                                                <a
                                                    href=""
                                                    className="fw-medium link-primary"
                                                >
                                                    #VZ2101
                                                </a>
                                            </td>
                                            <td className="customer_name">
                                                Mary Cousar
                                            </td>
                                            <td className="email">
                                                marycousar@velzon.com
                                            </td>
                                            <td className="phone">580-464-4694</td>
                                            <td className="date">06 Apr, 2021</td>
                                            <td className="status">
                                                <span className="badge badge-soft-success text-uppercase">
                                                    Active
                                                </span>
                                            </td>
                                            <td>
                                                <div className="d-flex gap-2">
                                                    <div className="edit">
                                                        <button
                                                            className="btn btn-sm btn-success edit-item-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#showModal"
                                                        >
                                                            Edit
                                                        </button>
                                                    </div>
                                                    <div className="remove">
                                                        <button
                                                            className="btn btn-sm btn-danger remove-item-btn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteRecordModal"
                                                        >
                                                            Remove
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div className="d-flex justify-content-end">
                                <div className="pagination-wrap hstack gap-2">
                                    <a
                                        className="page-item pagination-prev disabled"
                                        href="#"
                                    >
                                        Previous
                                    </a>
                                    <ul className="pagination listjs-pagination mb-0"></ul>
                                    <a
                                        className="page-item pagination-next"
                                        href="#"
                                    >
                                        Next
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ProducteurPage;
