<?php
/**
 * @OA\Schema(
 *     title="ProviderResource",
 *     description="Provider resource",
 *     @OA\Xml(
 *         name="ProviderResource"
 *     )
 * )
 */
class ProviderResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Provider
     */
    private $data;
}
