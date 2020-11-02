
let statePreviousId;
let cityPreviousId;
let previousIndex;

function selectState(index) 
{
    let state = document.querySelector(`#state_${index}`);
    let cities = document.querySelector(`#city_${index}`);
    let city_id = cities.getAttribute('data-id');
    let id = state.value;

    if ((id > 0) && (statePreviousId != id || index != previousIndex)) {
        let html = "";
        cities.removeAttribute('disabled');
        fetch(`/state/${id}/cities`)
            .then(res => {
                return res.json()
            })
            .then(result => {
                html += `<option value=''>Choose City</option>`;
                result.forEach((city, index) => {
                    html += `<option value="${city.id}" ${(city.id == city_id) ? 'selected' : ''}>${city.name}</option>`;
                });
                cities.innerHTML = html;
            })
            .catch(error => console.log(error))
        statePreviousId = id;
        previousIndex = index;
    }
}

function selectCity(index) 
{
    let cities = document.querySelector(`#city_${index}`);
    let townships = document.querySelector(`#township_${index}`);
    let township_id = townships.getAttribute('data-id');
    let id = (cities.value != 0) ? cities.value : cities.getAttribute('data-id');
    if ((id > 0 && cityPreviousId != id) || index) {
        let html = "";
        townships.removeAttribute('disabled');
        fetch(`/city/${id}/townships`)
            .then(res => {
                return res.json()
            })
            .then(result => {
                html += `<option value=''>Choose Township & Wrad</option>`;
                result.forEach((township, index) => {
                    
                    html += `<option value="${township.id}" ${(township.id == township_id) ? 'selected' : ''}>${township.name}</option>`;
                });

                townships.innerHTML = html;
            })
            .catch(error => console.log(error))
        cityPreviousId = id;
    }
}

function selectTownship(index)
{
    let townships = document.querySelector(`#township_${index}`);
    let home = document.querySelector(`#address_${index}`);
    let id = (townships.value != 0) ? townships.value : townships.getAttribute('data-id');
    if(id > 0) {
        home.removeAttribute('disabled');
    }
}


/* End - Current Address */