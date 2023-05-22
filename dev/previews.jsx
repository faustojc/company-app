import React from 'react'
import {ComponentPreview, Previews} from '@react-buddy/ide-toolbox'
import {ExampleLoaderComponent, PaletteTree} from './palette'
import {Link} from "../resources/js/Components/Link";
import Home from "../resources/js/Pages/Home";

const ComponentPreviews = () => {
    return (
        <Previews palette={<PaletteTree/>}>
            <ComponentPreview path="/ExampleLoaderComponent">
                <ExampleLoaderComponent/>
            </ComponentPreview>
            <ComponentPreview path="/Link">
                <Link/>
            </ComponentPreview>
            <ComponentPreview path="/Home">
                <Home/>
            </ComponentPreview>
        </Previews>
    )
}

export default ComponentPreviews
