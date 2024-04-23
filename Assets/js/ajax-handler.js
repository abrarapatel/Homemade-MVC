function snapMVCAjax(url, method = "GET", data = {}) {
    let fetchOptions = {
        method: method,
    };

    if (method === "POST") {
        let formData = new FormData();

        for (let key in data) {
            formData.append(key, data[key]);
        }
        
        fetchOptions.body = formData;
    }

    return fetch(url, fetchOptions)
        .then(response => response.text())
        .then(data => {
            return data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}