(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'FontAwesome\'">' + entity + '</span>' + html;
	}
	var icons = {
		'fa-search': '&#xf002;',
		'fa-chevron-left': '&#xf053;',
		'fa-chevron-right': '&#xf054;',
		'fa-info-circle': '&#xf05a;',
		'fa-chevron-down': '&#xf078;',
		'fa-twitter': '&#xf099;',
		'fa-facebook': '&#xf09a;',
		'fa-facebook-f': '&#xf09a;',
		'fa-linkedin': '&#xf0e1;',
		'fa-envelope-square': '&#xf199;',
		'fa-arrow-left': '&#xf060;',
		'fa-envelope': '&#xf0e0;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/fa-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());