import React from 'react';

const Loader = () => {
    return (
        <div id="preloader">
        <div id="status">
            <div className="spinner-border text-primary avatar-sm" role="status">
                <span className="visually-hidden">Chargement...</span>
            </div>
        </div>
    </div>
    );
};

export default Loader;