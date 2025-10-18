<?php
/**
 * @OA\Schema(
 *     title="CollaboratorResource",
 *     description="Collaborator resource",
 *     @OA\Xml(
 *         name="CollaboratorResource"
 *     )
 * )
 */
class CollaboratorResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Collaborator
     */
    private $data;
}
