function json_encode(param, lEscapeQuotes) {
	var _ret = JSON.stringify(param);
	return (lEscapeQuotes) ? _ret.replace(/\"/g, "'"): _ret;
}

function json_decode(json, lEscapeQuotes) {
	return JSON.parse((lEscapeQuotes) ? json.replace(/\'/g, '"') : json);
}

function in_array(needle, haystack) {
	return $.inArray(needle, haystack) > -1;
}