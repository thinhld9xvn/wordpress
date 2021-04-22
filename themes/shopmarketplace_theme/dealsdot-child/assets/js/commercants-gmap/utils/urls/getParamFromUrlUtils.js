export function getParamFromURL(param_name) {

    const url = new URL(window.location.href);

    const value = url.searchParams.get(param_name);

    if ( value ) {

        return '/' === value.substr(value.length - 1) ? value.substr(0, value.length - 1) : 
                                                        value;

    }

    return '';

}    