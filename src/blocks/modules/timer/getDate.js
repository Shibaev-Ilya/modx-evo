export const getDate = (day) => {
    let addDays = Number(day);
    let date = new Date();

    date.setHours('23');
    date.setMinutes('59');
    date.setSeconds('59');
    date.setDate(date.getDate() + addDays);

    return date
};
