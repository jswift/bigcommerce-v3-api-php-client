### Changes

This release changes the root API client class from `BigCommerce\ApiV3\Client` 
to `BigCommerce\ApiV3\BaseApiClient`. The interface is unchanged, this abstract class
has been added to allow for a common parent to both the V3 and V2 apis.

### New Features

 - Add support for creating Orders via the V2 API. In the future  this will be removed in favour of a V3 API when an endpoint is added.
 - Add `CustomersApi::getAllPages()` which allows fetching all the Customers matching the filter in one request.

