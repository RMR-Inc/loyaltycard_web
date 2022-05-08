<template>
   <div id="three"></div>
</template>

<script>
    import * as THREE from 'three/build/three.js'
    import { OrbitControls } from 'three/examples/jsm/controls/OrbitControls.js'
    import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader.js";

  export default {
    data() {
      return {
        container: null,
        camera: null,
        controls: null,
        scene: null,
        renderer: null,
        mesh: null
      }
    },
    methods: {
      init: function() {
          this.container = document.getElementById('three');

          this.scene = new THREE.Scene();
          // console.log(this.scene)

          this.camera = new THREE.PerspectiveCamera(70, this.container.clientWidth/this.container.clientHeight, 0.01, 10);
          this.camera.position.z = 1;

          this.renderer = new THREE.WebGLRenderer({antialias: true});
          this.renderer.setSize(this.container.clientWidth, this.container.clientHeight);
          this.container.appendChild(this.renderer.domElement);

          this.controls = new OrbitControls(this.camera, this.renderer.domElement);
          this.controls.enableDamping = true;
          this.controls.zoomSpeed = 0.3;

          window.addEventListener('resize', this.onWindowResize);

          // let geometry = new THREE.BoxGeometry( 0.2, 0.2, 0.2 );
          // let material = new THREE.MeshBasicMaterial( {color: 0x00ff00} );

          // this.mesh = new THREE.Mesh( geometry, material );
          // this.scene.add(this.mesh);

          const loader = new GLTFLoader();

          loader.load(
            '/fsatfood_store/scene.gltf',      
            function (gltf) {
              this.scene.add(gltf.scene);

              // gltf.animations;
              // gltf.scene;
              // gltf.scenes;
              // gltf.cameras;
              // gltf.asset;
            },
            function (xhr) {
              console.log((xhr.loaded / xhr.total * 100) + '% loaded');
            },
            function (error) {
              console.log('An error happened');
            }
          );

      },
      animate: function() {
        requestAnimationFrame(this.animate);
        // this.mesh.rotation.x += 0.01;
        // this.mesh.rotation.y += 0.02;
        this.renderer.render(this.scene, this.camera);
      },
      onWindowResize: function() {
        this.camera.aspect = this.container.clientWidth/this.container.clientHeight;
        this.camera.updateProjectionMatrix();

        this.renderer.setSize(this.container.clientWidth, this.container.clientHeight);
      }
    },
    mounted() {
        this.init();
        this.animate();
    }
  }
</script>

<style lang="css" scoped>
  #three {
      width: 100%;
      height: 500px;
    }
</style>