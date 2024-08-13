function applyfilter(event) {
   console.log(event.target.innerText);
   const params = {
    category : event.target.innerText
   };
   const baseUrl = '/';
   let queryString = new URLSearchParams(params).toString();
   let urlWithParams = `${baseUrl}?${queryString}`; 
   window.location.href = urlWithParams;
}