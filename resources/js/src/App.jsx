import React from 'react';
import { createRoot } from 'react-dom/client'
import { BrowserRouter } from "react-router-dom";
import MainRoutes from './routes';
import"./assets/libs/jsvectormap/css/jsvectormap.min.css"
import"./assets/libs/swiper/swiper-bundle.min.css"
import"./assets/css/bootstrap.min.css"
import"./assets/css/icons.min.css"
import"./assets/css/app.min.css"
import"./assets/css/custom.min.css"
import'./assets/js/layout.js'
export default function App(){
    return(
        <React.StrictMode>
            <BrowserRouter>
                <MainRoutes />
            </BrowserRouter>
        </React.StrictMode>
    );
}

if(document.getElementById('app')){
    createRoot(document.getElementById('app')).render(<App />)
}