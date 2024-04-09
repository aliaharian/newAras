self.onmessage = (e) => {
    switch (e.data.work) {
        case "loadHomepageImage":
            fetch(e.data.url, {cache: "force-cache"}).then((response) => {
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
            console.log("url is:", e.data.url)
            fetch(e.data.url, {cache: "force-cache"}).then((response) => {
                return response.blob()
            }).then((blob) => {
                console.log(blob)
                self.postMessage({work: "loadProductImage", id: e.data.id, value: blob})
            }).catch
            ((error) => {
                console.log("error", error)
            })
            break;
        case "loadProductGallery":
            console.log("url is:", e.data.url)
            fetch(e.data.url, {cache: "force-cache"}).then((response) => {
                return response.blob()
            }).then((blob) => {
                console.log(blob)
                self.postMessage({work: "loadProductGallery", id: e.data.id, galleryId: e.data.galleryId, value: blob})
            }).catch
            ((error) => {
                console.log("error", error)
            })
            break;
    }

}
