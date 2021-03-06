import Swal from 'sweetalert2'
import Lodash from 'lodash'

export function reloadPage () {
  window.location.reload()
}

export function changeStatusBtn (btnUpload, disabled, text) {
  btnUpload.innerText = text
  btnUpload.disabled = disabled
}

export function completeSuccess (resp) {
  if (resp.response) {
    const message = transformErrors(resp.response.data.errors)
    Swal.fire('', message, 'error')
  } else {
    Swal.fire('', resp.data.message, 'success')
  }
}

export function completeException (resp) {
  Swal.fire('Operation cancelled')
}

function transformErrors (errors) {
  let message = ''
  Lodash.each(errors, (value) => {
    message += value.join(' <br/>') + ' <br/>'
  })
  return message.slice(0, -2)
}
