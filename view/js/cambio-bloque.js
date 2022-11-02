function swap_block(block_id,new_block_filename) {
    
    clean_block(block_id);
    fetch_html_from_file(new_block_filename).then(new_html => {
        document.getElementById(block_id).innerHTML = new_html;
        //callback(callback_parameters);
      }).catch(err => {
        console.log(err);
      });


}

function swap_block_callback(block_id,new_block_filename,callback) {
    
    clean_block(block_id);
    fetch_html_from_file(new_block_filename).then(new_html => {
        document.getElementById(block_id).innerHTML = new_html;
        callback();
      }).catch(err => {
        console.log(err);
      });


}



function clean_block(block_id) {
    document.getElementById(block_id).innerHTML = "";
}

function fetch_html_from_file(filename) {
    var fetched_html = fetch(filename).then(function (response) {
        return response.text();
        }).then(function (html) {
            return html;
    }).catch(function (err) {
        console.warn(err);
    });
    return fetched_html;
}