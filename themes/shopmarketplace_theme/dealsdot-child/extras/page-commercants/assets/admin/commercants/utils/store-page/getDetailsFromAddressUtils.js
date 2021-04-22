export function getDetailsFromAddress(myAddr) {

    const info = myAddr.toString().split(',')[0],
            details = info.toString().split(' ');

    const data = {};

    if ( details.length === 1 ) {

        data.no = '';
        data.address = details[0];

    }

    else {

        data.no = details[0];

        details.splice(0, 1);

        data.address = details.join(' ');

    }

    return data;

}