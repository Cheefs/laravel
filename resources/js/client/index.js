
console.log('load')
const $usersContainer = document.querySelector('#container__users');

if ($usersContainer) {
    $usersContainer.addEventListener('click', (event) => {
       const { target: { classList, dataset: { id, url } }  } = event;
       if (classList.contains('js:toggleIsAdmin')) {
           toggleIsAdmin(id, url)
       }
    });
}


function toggleIsAdmin(userId, url) {
    console.log({ userId, url })
    const token = document.querySelector('meta[name="csrf-token"]');
    fetch(url,{
        method: 'POST',
        headers: {
            'Content-type': 'application/json',
            'X-CSRF-TOKEN': token?.content
        },
        body: JSON.stringify({ userId })
    });
}
