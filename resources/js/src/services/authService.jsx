import React from "react";
import API_BASIC from "../utility/ApiService";
import ApiRoute from "../utility/ApiRoute";
import { deleteUserData, saveUserData } from "../utility/Utils";

class AuthService extends React.Component {
    constructor(props) {
        super(props);
    }

    login(email, password) {
        return API_BASIC.post(ApiRoute.login, { email, password }).then(
            (response) => {
                const data = response?.data;
                console.log("response", response);
                if (data?.data?.access_token) {
                    saveUserData(JSON.stringify(data.data));
                }
            }
        );
    }

    logout(){
        deleteUserData();
        window.location.reload();
    }
}

export default new AuthService();
