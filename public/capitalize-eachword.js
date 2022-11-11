function capitalize(obj) {
    str = obj.value;
    obj.value = str.replace(/\w\S*/g, function(txt) {
      return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
    });
  }