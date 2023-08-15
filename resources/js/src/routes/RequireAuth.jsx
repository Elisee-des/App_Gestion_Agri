import { Navigate } from "react-router-dom";
import { getUserData } from "../utility/Utils"


const RequireAuth = ({children}) => {
    const authed = getUserData();
    console.log('authed', authed);
    return authed ? children : <Navigate to='/' replace />
}

export default RequireAuth;