const BACK_ENPOINT = 'api'
export const DOMAIN = 'http://127.0.0.1:8000'

export default {
    url: `${DOMAIN}/${BACK_ENPOINT}`,
    mediaUrl: `${DOMAIN}`,
    tokenType: 'Bearer',
    storageUserDataKeyName: 'USER-DATA',
    appRole: {
        admin: 'admin'
    }
}