<?
function errorRedirect($sMsg) {
  if (MODULE_NAME == 'Admin') {
    error($sMsg, U('/login'), 3);
  } else {
    error($sMsg, U('/Admin/login'), 3);
  }
}