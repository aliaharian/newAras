self.onmessage = (e) => {
    switch (e.data.work) {
        case "loadHomepageImage":
            fetch(e.data.url).then((response) => {
                return response.blob()
            }).then((blob) => {
                console.log(blob)
                self.postMessage({work: "loadHomepageImage", value: blob})
            }).catch
            ((error) => {
                console.log("error", error)
            })
            break;
        case "loadProductImage":
            fetch(e.data.url).then((response) => {
                return response.blob()
            }).then((blob) => {
                console.log(blob)
                self.postMessage({work: "loadProductImage", id: e.data.id, value: blob})
            }).catch
            ((error) => {
                console.log("error", error)
            })
            break;
    }

}
