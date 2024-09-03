
function postDelete(params = {
    confirmation: "Are you sure? You want to delete the item?",
    route: 'href',
    csrfToken: '',
    selector: "[data-action='delete']",
}) {
    params.route = params.route ? params.route : 'href';

    const custAction = document.querySelectorAll(params.selector);

    return custAction.forEach(function (element) {
        element.addEventListener('click', function() {

            if(confirm(params.confirmation)){

                const _deleteForm = document.createElement('form');
                _deleteForm.action = this.dataset[params.route];
                _deleteForm.method = "POST";
                const _csrfToken = document.createElement('input');
                _csrfToken.name = "_token";
                _csrfToken.type = "hidden";
                _csrfToken.value = params.csrfToken;
                _deleteForm.appendChild(_csrfToken);
                const _method = document.createElement('input');
                _method.name = "_method";
                _method.type = "hidden";
                _method.value = "DELETE";
                _deleteForm.appendChild(_method);
                this.insertAdjacentElement("afterend", _deleteForm);

                _deleteForm.submit();
            }
        });
    });
}
