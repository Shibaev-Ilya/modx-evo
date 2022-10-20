import { errorApplication, errorApplication2 } from "./errorMessages";
import { phoneReplace } from "./replaces";

export const handlingApplication = (formDataEntries, formInput) => {
    const { phone } = Object.fromEntries(formDataEntries.entries());
    if(!errorApplication(phone, formInput)) return "error"
    return { phone: phoneReplace(phone) }
}

export const handlingApplication2 = (formDataEntries, formInput) => {
    const { name, phone } = Object.fromEntries(formDataEntries.entries());
    if(!errorApplication2(name, phone, formInput)) return "error"
    return { name, phone: phoneReplace(phone) }
}

