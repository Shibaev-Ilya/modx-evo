import { validateName, validatePhone } from "./validation";


export const errorApplication = (phone, formInput) => {
    const phoneError = validatePhone(phone);
    formInput.eq(0).focus()
    if (!phoneError) formInput.addClass('error')
    if (!phoneError) return false;
    if (phoneError) return true;
}

export const errorApplication2 = (name, phone, formInput) => {
    const nameError = validateName(name);
    const phoneError = validatePhone(phone);
    
    if (!nameError) formInput.eq(0).addClass('error')
    if (!phoneError) formInput.eq(1).addClass('error')
    $("input.error").first().focus()
    if (!nameError && !phoneError) return false;
    if (nameError && phoneError) return true;
}
