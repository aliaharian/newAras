self.onmessage = (e) => {
    console.log("ok", e.data)
    fetch(e.data).then((response) => {
        return response.blob()
    }).then((blob) => {
        console.log(blob)
        self.postMessage({name: "introRight", value: blob})
    }).catch
    ((error) => {
        console.log("error", error)
    })
}
