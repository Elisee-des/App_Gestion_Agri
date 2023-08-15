import axios from 'axios';
import Constant from './constant';

const appConstant = {...Constant};

const API_BASIC = axios.create({
    baseURL: `${appConstant.url}`
});

export default API_BASIC