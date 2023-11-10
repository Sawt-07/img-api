let imginput = document.querySelector('#img');

let imgpreview = document.querySelector('#file-img');
imginput.onchange = evt => {
    const [file] = imginput.files;
    if (file) {
        imgpreview.src = URL.createObjectURL(file);
    }
}

function upload() {
    const data = {
        name: document.querySelector('#name').value,
        mail: document.querySelector('#mail').value,
        pass: document.querySelector('#pass').value,
        img: document.querySelector('#img').files[0],
    }

    const formdata = new FormData();
    formdata.append("name", data.name);
    formdata.append("mail", data.mail);
    formdata.append("pass", data.pass);
    formdata.append("img[]", data.img);
    console.log(formdata.get(data))


    const response = axios.post("/api/create", formdata).then((res) => {
        console.log(res.data);
        location.reload();
    });

}
function getPf(id) {
    //   console.log(id);
    //   console.log(img);
    //   return
    const get = {
        gid: document.querySelector('#get-id'),
        name: document.querySelector('#get-name'),
        mail: document.querySelector('#get-mail'),
        img: document.querySelector('#get-img'),
        img_alt: document.querySelector("#img-alt"),
    }

    const response = axios.get(`/api/getid/${id}`).then((res) => {
        console.log(res.data.profile);
        // console.log(res.data.profile.img);
        // return
        let imgview = document.querySelector('#af-img');
        // console.log(imgview)
        const imge = res.data.profile.img;
        // console.log(get.img=imge);
        // return
        imgview.src = imge;
        console.log(imgview);
        // return
        get.gid.value = res.data.profile.id;
        get.name.value = res.data.profile.name;
        get.mail.value = res.data.profile.email;
        get.img_alt.value = res.data.profile.img;

        // get.img = imge;
        // console.log(get.img.onchange())

        if (get.img != imge) {
            get.img.onchange = evt => {
                const [file] = get.img.files;

                if (file) {
                    imgview.src = URL.createObjectURL(file)
                    console.log(imgview);
                }
            }
        }


        // get.img.onchange = evt =>{
        //     const [file] = imginput.files;

        //     if(file){
        //         imgview.src = file
        //     }
        // }

    });
}
function update() {
    const data = {
        id: document.querySelector('#get-id').value,
        name: document.querySelector('#get-name').value,
        mail: document.querySelector('#get-mail').value,
        img: document.querySelector('#get-img').files[0],
        img_alt: document.querySelector("#img-alt").value,
    }
    console.log(data)
    //    const dat1 = {
    //       name : data.name.value,
    //       mail:data.mail.value,
    //       image:data.img.files[0],
    //       img_alt:data.img_alt.value,
    //    }
    //    console.log(dat1)
    const formdata = new FormData();
    // formdata.append("id",data.id);
    formdata.append("name", data.name);
    formdata.append("mail", data.mail);
    formdata.append("img[]", data.img);
    formdata.append("img_alt", data.img_alt);
    // console.log(formdata.getAll("img_alt"))
    const response = axios.post(`/api/update/${data.id}`, formdata).then((res) => {
        console.log(res);
        location.reload();
    });
    //    console.log(JSON.stringify(data.img.src))
    // const formdata = new FormData();
    // formdata.append("id",data.id);
    // formdata.append("name",data.name);
    // formdata.append("mail",data.mail);
    // formdata.append("img",data.img);
    // console.log(formdata.getAll(data))
}
