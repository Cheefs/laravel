window.addEventListener('load', () => {
    /** users-grid scripts **/
    (function (){
        const $usersContainer = document.querySelector('#container__users');

        if ($usersContainer) {
            $usersContainer.addEventListener('click', (event) => {
                event.preventDefault();
                const { target } = event;
                const { classList, dataset: { id, url } } = target;

                if (classList.contains('js:toggleIsAdmin')) {
                    target.disabled = true;
                    toggleIsAdmin(id, url).then( async res => {
                        const data = await res.json();
                        target.checked = data.is_admin;
                        target.disabled = false;
                    })
                }
            });
        }

        function toggleIsAdmin(userId, url) {
            const token = document.querySelector('meta[name="csrf-token"]');
            return fetch(url,{
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'X-CSRF-TOKEN': token?.content
                },
                body: JSON.stringify({ userId })
            });
        }
    })();

    // (function (){
    //     CKEDITOR.basePath = '/storage/ckeditor/';
    //     const options = {
    //         basePath: '/storage/ckeditor/',
    //         filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    //         filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    //         filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    //         filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    //     };
    //     CKEDITOR.replace('ckeditor4', options);
    //
    // })();
});
