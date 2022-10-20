export const getTimeRemaining = (endtime) => {
    let total = Date.parse(endtime) - Date.parse(new Date());
    let days = Math.floor(total / (1000 * 60 * 60 * 24));
    let hours = Math.floor((total / (1000 * 60 * 60)) % 24);
    let minutes = Math.floor((total / 1000 / 60) % 60);
    let seconds = Math.floor((total / 1000) % 60);

    return { days, hours, minutes, seconds, total };
};
