import Constant from "./constant"

const appConstant = {...Constant}

export const isUserLoggedIn = () => localStorage.getItem(appConstant.storageUserDataKeyName);

export const saveUserData = (data) => localStorage.setItem(appConstant.storageUserDataKeyName, data);

export const deleteUserData = () => localStorage.removeItem(appConstant.storageUserDataKeyName);

export const getUserData = () => JSON.parse(localStorage.getItem(appConstant.storageUserDataKeyName));

export const getUserRole = () => {
    const user = getUserData();
    if(user?.infos_user)
    {
        return user.infos_user.role;
    }
    return null;
}

export const slugify = (str) => {
    str = str.replace(/^\s+|\s+$/g, '');

    // Make the string lowercase
    str = str.toLowerCase();

    // Remove accents, swap ñ for n, etc
    var from = "ÁÄÂÀÃÅČÇĆĎÉĚËÈÊẼĔȆÍÌÎÏŇÑÓÖÒÔÕØŘŔŠŤÚŮÜÙÛÝŸŽáäâàãåčçćďéěëèêẽĕȇíìîïňñóöòôõøðřŕšťúůüùûýÿžþÞĐđßÆa·/_,:;";
    var to   = "AAAAAACCCDEEEEEEEEIIIINNOOOOOORRSTUUUUUYYZaaaaaacccdeeeeeeeeiiiinnooooooorrstuuuuuyyzbBDdBAa------";
    for (var i=0, l=from.length ; i<l ; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') 
    .replace(/\s+/g, '-') 
    // Collapse dashes
    .replace(/-+/g, '-'); 

    return str;
}


export const getDateTime = (hasComplet=false, separator='-') => {
    const formate=(number)=> {
        return number<=9 ? `0${number}` : number 
    }
    const tempDate = new Date();
    const date = tempDate.getFullYear() + separator + formate(tempDate.getMonth()+1) + separator + formate(tempDate.getDate()); 
    const hour = tempDate.getHours()+':'+ tempDate.getMinutes()+':'+ tempDate.getSeconds()
    const currentDate = hasComplet ? date +" "+hour : date
    return currentDate
}
