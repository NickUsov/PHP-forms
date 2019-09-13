window.onload = function() {
  let ao = new this.XMLHttpRequest();
  let country = this.document.querySelector("#text").value;
  ao.open("GET", "handler.php?country=" + country, true);
  ao.onreadystatechange = function() {
    if (ao.readyState === 4 && ao.status === 200) {
      document.querySelector("#result").innerHTML = ao.responseText;
      console.log(ao.responseText);
    }
  };
  ao.send(null);
  this.document.querySelector("#btn").addEventListener("click", () => {
    event.preventDefault();
    if (document.querySelector("#text").value !== "") {
      let ao = new this.XMLHttpRequest();
      let country = this.document.querySelector("#text").value;
      ao.open("GET", "handler.php?country=" + country, true);
      ao.onreadystatechange = function() {
        if (ao.readyState === 4 && ao.status === 200) {
          document.querySelector("#result").innerHTML = ao.responseText;
        }
      };

      ao.send(null);
    }
  });
};
