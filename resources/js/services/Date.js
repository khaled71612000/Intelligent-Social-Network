export default class DateProcessor {
    formatDateYMD(date) {
        var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

        if (month.length < 2) 
            month = '0' + month;
        if (day.length < 2) 
            day = '0' + day;

        return [year, month, day].join('-');
    }
    diffDate(date1, date2) { // Date function
  let diffTime = Math.abs(date2 - date1);
  let months = Math.floor(diffTime / (1000 * 60 * 60 * 24 * 7 * 12))
  let weeks = Math.floor(diffTime / (1000 * 60 * 60 * 24 * 7));
  let  days = Math.floor(diffTime/ (1000 * 60 * 60 * 24)); 
  let  hours = Math.floor(diffTime / (1000*60*60));
  let  minutes = Math.floor(diffTime / (1000*60));
  let seconds = Math.floor(diffTime / (1000));
  let result = {
      "Months":months,
      "Weeks":weeks,
      "Days":days,
      "Hours":hours,
      "Minutes":minutes,
      "Seconds":seconds
  }
  return result;
  }
  sinceWhen(date) {
      let difference = this.diffDate(date, new Date());
      let sentence = "";
      Object.keys(difference).some(key => {
          if(difference[key] > 0) {
              sentence += `${difference[key]} ${key} ago`;
              return true;
          }
      });
      return sentence == "" ? "Now" : sentence;
  }
}

