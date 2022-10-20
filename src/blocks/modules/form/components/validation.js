import { phoneReplace } from "./replaces";

export const validateName = (value) => value.length < 4 ? false : true;

export const validatePhone = (value) => {
    const trims = phoneReplace(value).slice(1)
    if (trims.length < 11) return false;
    return true;
}

// export const validateEmail = (value) => {
//     const regExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
//     if(!value.match(regExp)) return false;
//     return true;
// } 